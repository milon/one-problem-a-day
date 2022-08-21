---
extends: _layouts.post
section: content
title: Stamping the sequence
problemUrl: https://leetcode.com/problems/stamping-the-sequence/
date: 2022-08-21
categories: [greedy]
---

We will start from the target, then move backwords towards our source, which is a string of `?`. We will take a sliding window of length M, which is the length of the stamp, check whether it's matched with the stamp, if matched, we replace it in the target string, and add the index of the string to our result. We will do it for the whole target string, and if it is possible to get a string with all `?`, then we return the reversed output. Else we return and empty array.

```python
class Solution:
    def movesToStamp(self, stamp: str, target: str) -> List[int]:
        N, M = len(target), len(stamp)
        output = []
        
        move, maxmove = 0, 10*N
        premove = 0
        
        def check(src, trg):
            works = False
            for i in range(len(src)):
                if src[i] == trg[i]:
                    works = True
                elif src[i] == "?":
                    continue
                else:
                    return False
            return works
        
        while move < maxmove:
            premove = move
            for i in range(N-M+1):
                if check(target[i:i+M], stamp):
                    move += 1
                    output.append(i)
                    target = target[:i] + "?"*M + target[i+M:]
                    if target == "?"*N:
                        return reversed(output)
            if premove == move:
                return []
```

Time Complexity: `O(n^2*m)` <br/>
Space Complexity: `O(1)`