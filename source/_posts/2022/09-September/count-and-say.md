---
extends: _layouts.post
section: content
title: Count and say
problemUrl: https://leetcode.com/problems/count-and-say/
date: 2022-09-10
categories: [array-and-hashmap]
---

As the title says, we just do what the question says. The base-case has already been provided. All we need to do now is to write the recursive calls. The answer to that is provided in the question as well. Get the answer to `countAndSay(n-1)` and run the say function on the answer.

```python
class Solution:
    def countAndSay(self, n: int) -> str:
        def say():
            m = len(s)
            count = 1
            
            res = []
            for i in range(m):
                if i + 1 < m and s[i] == s[i+1]:
                    count += 1
                else:
                    res.append(str(count))
                    res.append(s[i])
                    count = 1 # reset count
            
            return ''.join(res)
        
        if n == 1:
            return '1'
        else:
            s = self.countAndSay(n-1)
            return say()
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`