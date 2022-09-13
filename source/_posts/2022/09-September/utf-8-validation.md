---
extends: _layouts.post
section: content
title: UTF-8 validation
problemUrl: https://leetcode.com/problems/utf-8-validation/
date: 2022-09-13
categories: [bit-manipulation]
---

We will follow the problem statement and assume everything is correct and move forward. We will use a try-except statement if anything goes wrong and will return false from the except statement.

```python:
class Solution:
    def validUtf8(self, data: List[int]) -> bool:
        data = collections.deque(data)
        
        try:
            while data:
                byte = data.popleft() & 0xFF
                
                if byte & 0x80:
                    times = 0
                    if (byte & 0b11100000) == 0b11000000:
                        times = 1
                    elif (byte & 0b11110000) == 0b11100000:
                        times = 2
                    elif (byte & 0b11111000) == 0b11110000:
                        times = 3
                    else:
                        return False

                    while times:
                        byte = data.popleft() & 0xFF
                        if (byte & 0b11000000) != 0b10000000:
                            return False
                        times -= 1
            return True
        except:
            return False
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`
