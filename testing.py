from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
import time
import sys
url = sys.argv[1]
options = webdriver.ChromeOptions()
options.add_argument('--headless')
driver = webdriver.Chrome(options = options)
driver.get("https://checktls.com")
# assert "Python" in driver.title
elem = driver.find_element(By.ID, "WidgetTLSVersion_address")
elem.clear()
elem.send_keys(url)
# elem.send_keys(Keys.RETURN)
elem2 = driver.find_element(By.XPATH, "/html/body/div[2]/div[1]/div[1]/div[4]/div/button")
elem2.click()
time.sleep(1)
elem3 = driver.find_element(By.XPATH, "//*[@id='WidgetTLSVersion_version']")
while (elem3.text == "working"):
    time.sleep(0.1)




print(elem3.text)
time.sleep(1)
driver.close()