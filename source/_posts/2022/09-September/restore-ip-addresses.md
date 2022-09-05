---
extends: _layouts.post
section: content
title: Restore ip addresses
problemUrl: https://leetcode.com/problems/restore-ip-addresses/
date: 2022-09-05
categories: [backtracking]
---

We will create a decision tree based on the rule that each segment of the ip address can be between 0 and 255. Then we run our DFS to get all possible options and return the result.

```python
class Solution:
    def restoreIpAddresses(self, s: str) -> List[str]:        
        res = []

        def dfs(index, dotNumbers):
            if len(dotNumbers) == 3 and index < len(s):
                last = s[index:]
				# check if the last num is valid
                if int(last) < 256 and not (last[0] == "0" and index != len(s)-1):
                    res.append(".".join(dotNumbers + [last]))
                return
            
            num = ""
            for i in range(index, len(s)):
                if num == "0":
                    return
                num += s[i]
                if int(num) < 256:
                    dfs(i + 1, dotNumbers + [num])
                else:
                    return
        dfs(0, [])
        return res
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(1)`